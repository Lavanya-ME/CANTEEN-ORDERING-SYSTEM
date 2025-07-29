const items = {
  "Burger": 80,
  "Sandwich": 60,
  "Tea": 15,
  "Juice": 30
};
function updateSummary() {
  let total = 0;
  let html = '';
  for (const item in items) {
    const checkbox = document.getElementById(`item-${item}`);
    const qtyInput = document.getElementById(`qty-${item}`);
    if (checkbox.checked) {
      qtyInput.disabled = false;
      const qty = parseInt(qtyInput.value);
      const price = items[item] * qty;
      total += price;
      html += `<p>${item} x ${qty} = ₹${price}</p>`;
    } else {
      qtyInput.disabled = true;
    }
  }
  document.getElementById("summary-details").innerHTML = html || 'No items selected.';
  document.getElementById("summary-total").textContent = total;
}

document.querySelectorAll('input[type="checkbox"], input[type="number"]').forEach(input => {
  input.addEventListener('input', updateSummary);
});

document.getElementById("order-form").addEventListener("submit", function(e) {
  e.preventDefault();
  const totalAmount = document.getElementById("summary-total").textContent;
  if (totalAmount === "0") {
    alert("Please select at least one item.");
    return;
  }
  localStorage.setItem("totalAmount", totalAmount);
  alert("✅ Order is successful! Continue with payment.");
  window.location.href = "payment.html";
});
