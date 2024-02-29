export function dynamicSearch() {
    const input = document.getElementById("search");

    input.addEventListener("keyup", function () {
        let filter = input.value.toUpperCase();

        const table = document.getElementById("items-table");
        const tr = table.getElementsByTagName("tr");

        for (let i = 0; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td")[0];

            if (td) {
                let txtValue = td.textContent || td.innerText;
                txtValue = txtValue.toUpperCase();

                if (txtValue.indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    });
}
