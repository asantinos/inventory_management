const assignedItemsList = document.getElementById("assignedItems");
const unassignedItemsList = document.getElementById("unassignedItems");

let assignedItems = assignedItemsList.querySelectorAll(".assigned-item");
let unassignedItems = unassignedItemsList.querySelectorAll(".unassigned-item");

const realBoxId = document.getElementById("box").value;

assignedItemsList.addEventListener("click", moveItemToUnassigned);
unassignedItemsList.addEventListener("click", moveItemToAssigned);

function moveItemToUnassigned(e) {
    if (e.target && e.target.classList.contains("item-row")) {
        const item = e.target;
        const itemId = item.getAttribute("data-id");

        item.setAttribute("data-box_id", null);

        // AJAX request to update the box_id of the item
        updateItemBoxId(itemId, null);

        item.classList.remove("hover:bg-red-400");
        assignedItemsList.removeChild(item);

        item.classList.add("hover:bg-green-500");
        unassignedItemsList.appendChild(item);

        item.classList.remove("assigned-item");
        item.classList.add("unassigned-item");
    }
}

function moveItemToAssigned(e) {
    if (e.target && e.target.classList.contains("item-row")) {
        const item = e.target;
        const itemId = item.getAttribute("data-id");

        item.setAttribute("data-box_id", realBoxId);

        // AJAX request to update the box_id of the item
        updateItemBoxId(itemId, realBoxId);

        item.classList.remove("hover:bg-green-500");
        unassignedItemsList.removeChild(item);

        item.classList.add("hover:bg-red-400");
        assignedItemsList.appendChild(item);

        item.classList.remove("unassigned-item");
        item.classList.add("assigned-item");
    }
}

function updateItemBoxId(itemId, boxId) {
    // AJAX request to update the box_id on the server
    fetch(`/update-item-box/${itemId}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify({ box_id: boxId }),
    })
        // .then((response) => response.json())
        // .then((data) => console.log(data))
        .catch((error) => console.error("Error:", error));
}
