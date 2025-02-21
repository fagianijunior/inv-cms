document.addEventListener("DOMContentLoaded", () => {
  let tickersOptions = document.getElementById("tickers-options");
  tickersOptions.addEventListener("change", (e) => {
    window.location.href = e.target.value;
  });
});
