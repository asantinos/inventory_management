export function showItem() {
    const itemRow = document.querySelectorAll(".item-row");

    itemRow.forEach((row) => {
        row.addEventListener("click", (e) => {
            const isButtonClick =
                e.target.tagName === "A" || e.target.tagName === "BUTTON";

            if (!isButtonClick) {
                e.preventDefault();
                const itemId = row.getAttribute("data-id");
                window.location.href = `/items/${itemId}`;
            }
        });
    });
}

export function showBox() {
    const boxRow = document.querySelectorAll(".box-row");

    boxRow.forEach((row) => {
        row.addEventListener("click", (e) => {
            const isButtonClick =
                e.target.tagName === "A" || e.target.tagName === "BUTTON";

            if (!isButtonClick) {
                e.preventDefault();
                const boxId = row.getAttribute("data-id");
                window.location.href = `/boxes/${boxId}`;
            }
        });
    });
}
