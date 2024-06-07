

//selects del formulari html
let select_cat = document.getElementById("categoria");
let select_subcat = document.getElementById("subcategoria");



//fetch que agafa les categories de la bbdd
fetch("getCats.php")
.then((response) => response.json())
.then((data) => {
    data.forEach(value => {
        let option = document.createElement("option"); 
        option.value = value.nom;
        option.innerHTML = value.nom; 
        option.classList.add("checkCat"); 
        select_cat.appendChild(option); 
    });
})
.catch((error) => {console.log(error)});
//detecta el canvi de la categoria seleccionada
select_cat.addEventListener("change", function() {
    //creem un formdata i li afegim la categoria seleccionada
    let formData = new FormData();
    formData.append("cat", select_cat.selectedIndex);
    let options = {
        method: 'POST',
        body: formData
    }




    //fetch que obté les subcategories de la categoria seleccionada
    fetch("getSubCats.php", options)
    .then((response) => response.json())
    .then((data) => {
        select_subcat.innerHTML = "";
        data.forEach(value => {
            let option = document.createElement("option"); 
            option.value = value.nom;
            select_subcat.appendChild(option); 
            option.innerHTML = value.nom;  
        });
    })
    .catch((error) => {console.log(error)});
})