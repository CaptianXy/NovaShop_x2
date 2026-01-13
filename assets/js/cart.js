function addToCart(btn) {
  btn.classList.add("shake");

  setTimeout(() => {
    btn.classList.remove("shake");
  }, 500);
}
