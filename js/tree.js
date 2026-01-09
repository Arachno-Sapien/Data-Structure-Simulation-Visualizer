class Node {
    constructor(val) {
        this.val = parseInt(val);
        this.left = null;
        this.right = null;
    }
}

let root = null;
const canvas = document.getElementById('treeCanvas');
const ctx = canvas.getContext('2d');

function insertNode() {
    let val = document.getElementById('treeVal').value;
    if (!val) return;
    
    let newNode = new Node(val);
    if (!root) {
        root = newNode;
    } else {
        insertRecursively(root, newNode);
    }
    drawTree();
}

function insertRecursively(current, newNode) {
    if (newNode.val < current.val) {
        if (!current.left) current.left = newNode;
        else insertRecursively(current.left, newNode);
    } else {
        if (!current.right) current.right = newNode;
        else insertRecursively(current.right, newNode);
    }
}

function drawTree() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if (root) drawNode(root, canvas.width / 2, 40, 200);
}

function drawNode(node, x, y, offset) {
    // Draw Left Child
    if (node.left) {
        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.lineTo(x - offset, y + 60);
        ctx.stroke();
        drawNode(node.left, x - offset, y + 60, offset / 2);
    }
    // Draw Right Child
    if (node.right) {
        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.lineTo(x + offset, y + 60);
        ctx.stroke();
        drawNode(node.right, x + offset, y + 60, offset / 2);
    }
    
    // Draw Circle (Node)
    ctx.beginPath();
    ctx.arc(x, y, 20, 0, 2 * Math.PI);
    ctx.fillStyle = "#4CAF50";
    ctx.fill();
    ctx.stroke();
    
    // Draw Text
    ctx.fillStyle = "white";
    ctx.font = "bold 14px Arial";
    ctx.textAlign = "center";
    ctx.fillText(node.val, x, y + 5);
}

function clearTree() {
    root = null;
    drawTree();
}
