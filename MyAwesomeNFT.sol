// SPDX-License-Identifier: MIT
pragma solidity ^0.8.20;

import "@openzeppelin/contracts/token/ERC1155/ERC1155.sol";
import "@openzeppelin/contracts/access/Ownable.sol";
import "@openzeppelin/contracts/utils/Strings.sol";

contract MyAwesomeNFT is ERC1155, Ownable {

    string public name;
    string public symbol;

    // Optional: base URI cho metadata (ví dụ trên IPFS)
    string private _uri;

    // Đếm ID để tự động tạo ID mới khi mint (bắt đầu từ 1)
    uint256 public nextId = 1;

    // Mapping từ tokenId => tổng cung đã mint (nếu muốn giới hạn từng loại)
    mapping(uint256 => uint256) public totalSupply;

    // Optional: giới hạn cung mỗi tokenId (0 = không giới hạn)
    mapping(uint256 => uint256) public maxSupply;

    constructor() ERC1155("") Ownable(msg.sender) {
        name = "MyAwesomeNFT";
        symbol = "MANFT";

        // Ví dụ set base URI (thay bằng link IPFS của bạn)
        _uri = "https://api.example.com/metadata/";
        
        // Tạo sẵn 5 loại NFT đầu tiên làm ví dụ
        _mintBatchTokens(msg.sender);
    }

    // Mint một loại NFT mới (ai cũng có thể gọi nếu bạn muốn public mint công khai)
    function mint(uint256 amount, uint256 maxSupplyForThisId) external {
        uint256 tokenId = nextId++;

        if (maxSupplyForThisId > 0) {
            maxSupply[tokenId] = maxSupplyForThisId;
        }

        _mint(msg.sender, tokenId, amount, "");
        totalSupply[tokenId] += amount;
    }

    // Mint cho người khác (chỉ owner)
    function mintTo(address to, uint256 id, uint256 amount) external onlyOwner {
        require(maxSupply[id] == 0 || totalSupply[id] + amount <= maxSupply[id], "Exceed max supply");
        _mint(to, id, amount, "");
        totalSupply[id] += amount;
    }

    // Mint batch nhiều loại cùng lúc (ví dụ lúc deploy)
    function _mintBatchTokens(address to) internal {
        uint256[] memory ids = new uint256[](5);
        uint256[] memory amounts = new uint256[](5);

        for (uint256 i = 0; i < 5; i++) {
            ids[i] = nextId;
            amounts[i] = 1000; // mỗi loại có 1000 cái
            totalSupply[nextId] = 1000;
            nextId++;
        }

        _mintBatch(to, ids, amounts, "");
    }

    // URI cho metadata (hỗ trợ {id} theo chuẩn ERC1155)
    function uri(uint256 tokenId) public view override returns (string memory) {
        return string(abi.encodePacked(_uri, Strings.toString(tokenId), ".json"));
    }

    // Optional: thay đổi base URI sau này
    function setURI(string memory newuri) external onlyOwner {
        _uri = newuri;
    }

    // Rút ETH nếu contract có tiền (phòng trường hợp ai gửi nhầm)
    function withdraw() external onlyOwner {
        payable(owner()).transfer(address(this).balance);
    }
}
