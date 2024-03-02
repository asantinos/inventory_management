export function onlyOwnLoans() {
    const loansTable = document.getElementById("loans-table");
    const authUserId = loansTable.getAttribute("data-auth-user-id");

    const ownLoansCheckbox = document.getElementById("showOnlyMyLoans");

    ownLoansCheckbox.addEventListener("change", function () {
        let loans = document.querySelectorAll(".loan-row");

        loans.forEach(function (loan) {
            const userId = loan.getAttribute("data-user-id");
            const ownLoansLabel = document.getElementById(
                "showOnlyMyLoansLabel"
            );

            if (this.checked) {
                ownLoansLabel.innerHTML = "Show all loans";

                if (userId !== authUserId) {
                    loan.style.display = "none";
                }
            } else {
                ownLoansLabel.innerHTML = "Show only my loans";
                loan.style.display = "";
            }
        }, this);
    });
}

export function onlyAvailable() {
    const items = document.querySelectorAll(".item-row");
    const availableCheckbox = document.getElementById("showOnlyAvailable");

    availableCheckbox.addEventListener("change", function () {
        items.forEach(function (item) {
            const available = item.getAttribute("data-available");
            const availableLabel = document.getElementById(
                "showOnlyAvailableLabel"
            );

            if (this.checked) {
                availableLabel.innerHTML = "Show all items";

                if (available === "false") {
                    item.style.display = "none";
                }
            } else {
                availableLabel.innerHTML = "Show only available items";
                item.style.display = "";
            }
        }, this);
    });
}
