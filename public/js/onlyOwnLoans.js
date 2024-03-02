export function onlyOwnLoans() {
    const loansTable = document.getElementById("loans-table");
    const authUserId = loansTable.getAttribute("data-auth-user-id");
    
    const ownLoansCheckbox = document.getElementById("showOnlyMyLoans");

    ownLoansCheckbox.addEventListener("change", function () {
        console.log(authUserId);
        let loans = document.querySelectorAll(".loan-row");

        loans.forEach(function (loan) {
            const userId = loan.getAttribute("data-user-id");

            if (this.checked) {
                if (userId !== authUserId) {
                    loan.style.display = "none";
                }
            } else {
                loan.style.display = "";
            }
        }, this);
    });
}
