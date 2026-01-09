<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DS-Visualizer/header.php';
?>

<h2>Singly Linked List</h2>
<a href="/DS-Visualizer/index.php" class="back-link">← Back to Menu</a>
<br>

<div class="controls">
    <input type="text" id="llVal" placeholder="Value">
    <input type="number" id="llIndex" placeholder="Idx" style="width: 70px;">
    <br><br>
    <button onclick="addHead()">Add Head</button>
    <button onclick="addTail()">Add Tail</button>
    <button onclick="addAtPos()">Add at Index</button>
    <button onclick="removeHead()" class="btn-del">Delete Head</button>
</div>

<div id="llDisplay" class="ll-container"></div>

<style>
/* ===== PAGE ===== */
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

/* ===== CONTROLS ===== */
.controls {
    margin: 20px auto;
    background: #ffffff;
    padding: 20px;
    display: inline-block;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

body.dark .controls {
    background: #1e1e1e;
    box-shadow: 0 4px 12px rgba(255,255,255,0.05);
}

input {
    padding: 8px;
    margin: 4px;
}

button {
    padding: 8px 14px;
    background: #27ae60;
    color: white;
    border: none;
    cursor: pointer;
    margin: 3px;
    border-radius: 4px;
    font-weight: bold;
}

button.btn-del {
    background: #c0392b;
}

/* ===== LINKED LIST VISUAL ===== */
.ll-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 30px;
    margin-top: 20px;
}

.node-wrapper {
    display: flex;
    align-items: center;
}

.node {
    width: 60px;
    height: 60px;
    border: 2px solid #1e8449;
    background: #4CAF50;
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    border-radius: 50%;
}

.node small {
    font-size: 10px;
    opacity: 0.9;
}

.arrow {
    font-size: 28px;
    margin: 0 12px;
    font-weight: bold;
    color: #333;
}

body.dark .arrow {
    color: #e0e0e0;
}
</style>

<script>
let list = [];

function render() {
    const container = document.getElementById('llDisplay');
    container.innerHTML = '';

    if (list.length === 0) {
        container.innerHTML = '<p>List is Empty</p>';
        return;
    }

    list.forEach((val, index) => {
        let wrapper = document.createElement('div');
        wrapper.className = 'node-wrapper';

        let nodeHtml = `<div class="node">${val}<small>${index}</small></div>`;
        let arrowHtml = (index < list.length - 1)
            ? `<div class="arrow">→</div>`
            : `<div class="arrow">→ NULL</div>`;

        wrapper.innerHTML = nodeHtml + arrowHtml;
        container.appendChild(wrapper);
    });
}

function addHead() {
    let val = document.getElementById('llVal').value;
    if (!val) return;
    list.unshift(val);
    render();
}

function addTail() {
    let val = document.getElementById('llVal').value;
    if (!val) return;
    list.push(val);
    render();
}

function addAtPos() {
    let val = document.getElementById('llVal').value;
    let idx = parseInt(document.getElementById('llIndex').value);
    if (!val || isNaN(idx)) return alert("Need Value and Index");
    if (idx < 0 || idx > list.length) return alert("Invalid Index");
    list.splice(idx, 0, val);
    render();
}

function removeHead() {
    if (list.length === 0) return alert("List is empty");
    list.shift();
    render();
}
</script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DS-Visualizer/footer.php';
?>
