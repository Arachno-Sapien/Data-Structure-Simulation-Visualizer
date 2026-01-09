<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DS Visualizer</title>

    <!-- Main styles (ABSOLUTE PATHS) -->
    <link rel="stylesheet" href="/DS-Visualizer/css/style.css">
    <link rel="stylesheet" href="/DS-Visualizer/css/visualizer.css">
</head>
<body>

<nav class="navbar">
    <div class="nav-left">
        <h2>Data Structure Simulator<h2>
    </div>

    <button id="themeToggle" class="theme-btn">🌙 Dark</button>
</nav>

<script>
    const toggleBtn = document.getElementById('themeToggle');
    const body = document.body;

    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
        toggleBtn.innerText = '☀️ Light';
    }

    toggleBtn.onclick = () => {
        body.classList.toggle('dark');
        const isDark = body.classList.contains('dark');
        toggleBtn.innerText = isDark ? '☀️ Light' : '🌙 Dark';
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
    };
</script>
