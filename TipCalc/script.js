function calculateTip() {
    var billAmount = parseFloat(document.getElementById('bill').value);
    var tipPercentage = parseFloat(document.getElementById('tip').value);
  
    if (isNaN(billAmount) || isNaN(tipPercentage)) {
      alert('Please enter valid numbers.');
      return;
    }
  
    var tipAmount = billAmount * (tipPercentage / 100);
    var totalBill = billAmount + tipAmount;
  
    document.getElementById('total').textContent = 'Total Bill (including tip): $' + totalBill.toFixed(2);
  }
  