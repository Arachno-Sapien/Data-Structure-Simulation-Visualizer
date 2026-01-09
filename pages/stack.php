<?php include __DIR__ . '/../header.php'; ?>

<h2>Stack Visualization (LIFO)</h2>
<a href="/DS-Visualizer/index.php" class="back-link">← Back to Menu </a>
<br>

<div class="controls">
    <input type="number" id="stackInput" placeholder="Enter Value">
    <button onclick="push()">Push</button>
    <button onclick="pop()" class="btn-danger">Pop</button>
</div>

<div id="stackDisplay" class="visual-container stack-container">
    </div>
<style>
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
</style>

<script src="/DS-Visualizer/js/stack.js"></script>
<?php include __DIR__ . '/../footer.php'; ?>