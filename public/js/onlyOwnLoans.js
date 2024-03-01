export function onlyOwnLoans() {
    const showOnlyMyLoansCheckbox = document.getElementById("showOnlyMyLoans");
    const loanRows = document.querySelectorAll(".loan-row");

    showOnlyMyLoansCheckbox.addEventListener("change", function () {
        const isChecked = showOnlyMyLoansCheckbox.checked;

        loanRows.forEach(function (row) {
            const userId = row.dataset.id;

            row.style.display =
                isChecked && userId !== "{{ Auth::id() }}" ? "none" : "";
        });
    });
}
