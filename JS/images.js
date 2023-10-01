const buttons = document.querySelectorAll("#small_img > button");
const img = document.getElementById('boat_img');

for (const btn of buttons) {
    btn.addEventListener('click', function(e) {
        img.src = btn.getAttribute('data-src');
    })
}