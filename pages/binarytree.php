<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DS-Visualizer/header.php';
?>

<h2>Binary Search Tree (BST)</h2>

<a href="/DS-Visualizer/index.php" class="back-link">← Back to Menu </a>
<br>
<div class="controls">
    <input type="number" id="treeVal" placeholder="Enter Number">
    <button onclick="insertNode()">Insert</button>
    <button onclick="clearTree()" class="btn-del">Clear</button>
</div>

<canvas id="treeCanvas" width="900" height="420"></canvas>

<style>
h2 {
    margin-top: 30px;
}

.back-link {
    display: inline-block;
    margin-bottom: 20px;
    font-weight: bold;
    text-decoration: none;
    color: #2c3e50;
}

body.dark .back-link {
    color: #e0e0e0;
}

.controls {
    margin-bottom: 20px;
    background: #ffffff;
    display: inline-block;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

body.dark .controls {
    background: #1e1e1e;
    box-shadow: 0 4px 12px rgba(255,255,255,0.05);
}

input {
    padding: 8px;
}

button {
    padding: 8px 15px;
    background: #27ae60;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    border-radius: 4px;
}

button.btn-del {
    background: #c0392b;
}

canvas {
    border-radius: 10px;
    background: #ffffff;
    display: block;
    margin: 0 auto;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

body.dark canvas {
    background: #1e1e1e;
}
</style>

<script>
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

const isDark = () => document.body.classList.contains('dark');

function insertNode() {
    let val = document.getElementById('treeVal').value;
    if (!val) return;

    let newNode = new Node(val);
    if (!root) root = newNode;
    else insertRecursively(root, newNode);

    drawTree();
    document.getElementById('treeVal').value = '';
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

    if (isDark()) {
        ctx.fillStyle = "#1e1e1e";
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    }

    if (root) drawNode(root, canvas.width / 2, 40, 200);
}

function drawNode(node, x, y, offset) {
    ctx.strokeStyle = isDark() ? "#e0e0e0" : "#333";

    if (node.left) {
        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.lineTo(x - offset, y + 70);
        ctx.stroke();
        drawNode(node.left, x - offset, y + 70, offset / 2);
    }

    if (node.right) {
        ctx.beginPath();
        ctx.moveTo(x, y);
        ctx.lineTo(x + offset, y + 70);
        ctx.stroke();
        drawNode(node.right, x + offset, y + 70, offset / 2);
    }

    ctx.beginPath();
    ctx.arc(x, y, 22, 0, 2 * Math.PI);
    ctx.fillStyle = "#4CAF50";
    ctx.fill();
    ctx.stroke();

    ctx.fillStyle = "white";
    ctx.font = "bold 14px Arial";
    ctx.textAlign = "center";
    ctx.fillText(node.val, x, y + 5);
}

function clearTree() {
    root = null;
    drawTree();
}
</script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DS-Visualizer/footer.php';
?>
