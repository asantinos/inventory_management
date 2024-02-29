export function setupItemClickHandler() {
    const itemRow = document.querySelectorAll(".item-row");

    itemRow.forEach((row) => {
        row.addEventListener("click", (e) => {
            e.preventDefault();
            
            const itemId = row.getAttribute("data-id");
            window.location.href = `/items/${itemId}`;
        });
    });
}
