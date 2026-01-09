<?php
// DEBUG (remove later if you want)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Absolute include (THIS FIXES BLANK PAGE)
require_once $_SERVER['DOCUMENT_ROOT'] . '/DS-Visualizer/header.php';
?>

<h2>Linear Queue Visualization (FIFO)</h2>
<a href="/DS-Visualizer/index.php" class="back-link">← Back to Menu </a>
<br>

<div class="queue-page">

    <div class="controls">
        <input type="number" id="queueInput" placeholder="Enter Value">
        <button onclick="enqueue()">Enqueue</button>
        <button onclick="dequeue()" class="btn-danger">Dequeue</button>
    </div>

    <div class="queue-wrapper">
        <div class="queue-label front-label">FRONT</div>

        <div id="queueDisplay" class="visual-container queue-container"></div>

        <div class="queue-label rear-label">REAR</div>
    </div>

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

<script src="/DS-Visualizer/js/queue.js" defer></script>

<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/DS-Visualizer/footer.php';
?>
