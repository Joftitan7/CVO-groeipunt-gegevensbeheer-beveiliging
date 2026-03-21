async function loadProducts() {
    const naam = document.getElementById("filterNaam").value;
    const categorie = document.getElementById("filterCategorie").value;

    const response = await fetch(
        `api/get_products.php?naam=${encodeURIComponent(naam)}&categorie=${encodeURIComponent(categorie)}`
    );

    const producten = await response.json();

    const tbody = document.querySelector("#productenTable tbody");
    tbody.innerHTML = "";

    producten.forEach(product => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td><input type="checkbox" class="delete-checkbox" value="${product.id}"></td>
            <td>${product.id}</td>
            <td>${product.naam}</td>
            <td>${product.omschrijving}</td>
            <td>${product.prijs}</td>
            <td>${product.categorie}</td>
            <td><button class="edit-button" data-id="${product.id}">Bewerken</button></td>
        `;

        tbody.appendChild(row);
    });

    document.querySelectorAll(".edit-button").forEach(btn => {
        btn.addEventListener("click", openUpdateForm);
    });
}


loadProducts();

document.getElementById("addProductForm").addEventListener("submit", function(e) {
    e.preventDefault();


    ////
    ////loadProducts();


    ////document.getElementById("addProductForm").addEventListener("submit", function(e) {

    //console.log(" 
    // 
    //")
    //// e.preventDefault();


    const formData = new FormData(this);

    fetch("api/add_products.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);

        loadProducts();
        this.reset();
    })
    .catch(err => console.error(err));
});

async function openUpdateForm(event) {
    const id = event.target.dataset.id;

    const response = await fetch(`api/get_product.php?id=${id}`)
    const product = await response.json()

    // document.getElementById("updateProducId").value = product.id;
    // document.getElementById("updateProductNaam").value = product.naam;
    // document.getElementById("updateProductOmschrijving").value = product.omschrijving;
    // document.getElementById("updateProductPrijs").value = product.prijs;
    // document.getElementById("updateProductCategorie").value = product.categorie;


    document.getElementById("updateId").value = product.id
    document.getElementById("updateNaam").value = product.naam;
    document.getElementById("updateOmschrijving").value = product.omschrijving;
    document.getElementById("updatePrijs").value = product.prijs
    document.getElementById("updateCategorie").value = product.categorie

    document.getElementById("updateModal").style.display = "block"
}

document.getElementById("updateForm").addEventListener("submit", async function(e) {
    e.preventDefault()

    const formData = new FormData(this)
    const data = Object.fromEntries(formData)

    const response = await fetch("api/update_product.php", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    });

    const result = await response.json()
    alert(result.message)

    document.getElementById("updateModal").style.display = "none"
    loadProducts()
});


document.getElementById('cancelUpdate').addEventListener('click', function (e) {
    document.getElementById("updateModal").style.display = "none"
})
// console.log(" ")

//AI werd hier gebruikt omdat mijn pagina steeds bleef herladen en dat maakte het moeilijk om effectief en snel te werken met de php live server extension
//
    

document.getElementById("deleteSelectedButton").addEventListener("click", async () => {
    const selectedCheckboxes = document.querySelectorAll(".delete-checkbox:checked")
    const selectedIds = Array.from(selectedCheckboxes).map(cb => cb.value)

    if (selectedIds.length === 0) {
        alert("Selecteer minstens één product om te verwijderen.")
        return;
    }

    const response = await fetch("api/delete_products.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ ids: selectedIds })
    })

    const result = await response.json();
    alert(result.message)

    loadProducts()
});

//



//




async function loadCategories() {
    const response = await fetch("api/get_categories.php")
    const categories = await response.json()

    const select = document.getElementById("filterCategorie")

    categories.forEach(cat => {
        const option = document.createElement("option")
        option.value = cat.categorie
        option.textContent = cat.categorie
        select.appendChild(option)
    })
}

loadCategories()


// document.getElementById("filterButton").addEventListener("click", loadProducts);







document.getElementById("filterButton").addEventListener("click", loadProducts)



document.getElementById("filterCategorie").addEventListener("change", loadProducts)
document.getElementById("filterNaam").addEventListener("input", loadProducts)
