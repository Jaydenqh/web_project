function validateForm() {
  let name = document.querySelector('[name="product_name"]').value;
  let price = document.querySelector('[name="price"]').value;
  let qty = document.querySelector('[name="quantity"]').value;

  if (name.trim() === "") {
    alert("Please enter product name.");
    return false;
  }
  if (price <= 0) {
    alert("Price must be greater than 0.");
    return false;
  }
  if (qty < 0) {
    alert("Quantity cannot be negative.");
    return false;
  }
  return true; 
}
