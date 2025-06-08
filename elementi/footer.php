 <footer class="bg-dark text-white py-4 text-center"><p class="mb-0 small">&copy; 2025 ProšećiMe</p></footer>

  <script>
    const username = localStorage.getItem('username');
    const btn = document.getElementById('loginBtn');
    if (username && btn) {
      btn.textContent = username;
    }
  </script>