document.querySelector("button").addEventListener("click", (event) => {
  event.preventDefault();
  const field1Value = document.getElementById("weight").value;
  const field2Value = document.getElementById("impurities").value;
  const price = document.getElementById("price").value;

  document.getElementById("percentOfDiscount").value = field2Value - 2;
  document.getElementById("finalPrice").value =
    ((1 - document.getElementById("percentOfDiscount").value / 100) *
      field1Value *
      price) /
    field1Value;
});
