/**
 * limit Stock Product Order input
 */
const quantityStock = document.getElementById('select-product');
const inputQuantity = document.getElementById('input-amount');
const btnSubmit = document.getElementById('btn-submit');

//Modifica o texto do botão conforme a mudança do input numérico
if (btnSubmit) {
    inputQuantity.addEventListener("change", function (event){
        btnSubmit.innerText = (inputQuantity.value < 0) ? "Remover" : "Adicionar";
    })
}

if (quantityStock){
    quantityStock.addEventListener("change", function (event) {
        const selectedOption = event.target.options[event.target.selectedIndex];
        const selectedOptionText = selectedOption.text;
        const maxQuantity = selectedOptionText.split(":")[1].trim(); // Obtém o número depois do "estoque:"
        inputQuantity.max = maxQuantity;

        // Obtém o valor selecionado do option do select
        var selectedValue = quantityStock.value;

        // Seleciona a tabela
        var table = document.getElementById("product-list");

        // Percorre cada linha da tabela
        for (var i = 0; i < table.rows.length; i++) {
            // Obtém o valor da primeira célula da linha (o ID do produto)
            var productId = table.rows[i].cells[0].innerHTML;

            // Se o valor selecionado for igual ao ID do produto na linha atual
            if (selectedValue == productId) {
                // Obtém o valor da terceira célula da linha (a quantidade)
                var amount = table.rows[i].cells[2].innerHTML;

                // Define o valor mínimo no elemento de entrada de número
                inputQuantity.min = -amount;
                // Sai do loop, já que encontramos o valor que queríamos
                break;
            }
        }
    });
}


/**
 * Sweet Alert client Show
 */
function clientShow(id) {
    let client = document.querySelector(`#client_show_${id}`);
    let link = client.dataset.value;

    fetch(link)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .catch((error) => {
            Swal.showValidationMessage(`Request failed: ${error}`);
        })
        .then((result) => {
            // create a 'Swal' variable
            Swal.fire({
                title: `${result.name}`,
                showConfirmButton: false,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: "Sair",
                width: "35em",
                padding: "1em",
                html: `
                        <div class="container">
                            <div class="row justify-content-center mx-auto">
                                <div class="col-md-8 col-lg-6 col-xl-12">
                                    <div class="card text-black">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-sm table-bordered">
                                                    <tr>
                                                        <th class="text-start">Id: </th>
                                                        <td class="text-start">${result.id}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">E-mail: </th>
                                                        <td class="text-start">${result.email}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start text-nowrap">Telefone:</th>
                                                        <td class="text-start">${result.telephone}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start text-nowrap">Endereço:</th>
                                                        <td class="text-start">${result.address}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`,
            });
        });
}

/**
 * Sweet Alert Product Show
 */
function productShow(id) {
    let product = document.querySelector(`#product_show_${id}`);
    let link = product.dataset.value;

    fetch(link)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .catch((error) => {
            Swal.showValidationMessage(`Request failed: ${error}`);
        })
        .then((result) => {
            var price = Number(result.product_stock.sale_price).toLocaleString(
                "pt-BR",
                { style: "currency", currency: "BRL" }
            );
            var total = Number(result.product_stock.total).toLocaleString(
                "pt-BR",
                { style: "currency", currency: "BRL" }
            );
            console.log(result);
            // create a 'Swal' variable
            Swal.fire({
                title: `${result.name}`,
                showConfirmButton: false,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: "Sair",
                width: "35em",
                padding: "1em",
                html: `
                        <div class="container-fluid">
                            <div class="row justify-content-center mx-auto">
                                <div class="col-md-8 col-lg-6 col-xl-12">
                                    <div class="card text-black">
                                        <div class="text-center"><img src="${result.product_detail.image}" class="rounded" alt="Imagem do produto" width="50%"/></div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <p class="text-muted mb-4">${result.name}</p>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-sm table-bordered">
                                                    <tr>
                                                        <th class="text-start">Id:</th>
                                                        <td class="text-start">${result.id}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Fornecedor:</th>
                                                        <td class="text-start">${result.provider.name}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Preço:</th>
                                                        <td class="text-start">${price}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Quantidade em Estoque:</th>
                                                        <td class="text-start">${result.product_stock.quantity}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Estoque min/max:</th>
                                                        <td class="text-start">${result.product_stock.min_stock} | ${result.product_stock.max_stock}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Comp, Alt e Larg(cm)</th>
                                                        <td class="text-start">${result.product_detail.length} X ${result.product_detail.height} X ${result.product_detail.width}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Peso(Kg)</th>
                                                        <td class="text-start">${result.product_detail.weight}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Descrição:</th>
                                                        <td class="text-start">${result.description}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                                <span>Total de Produtos em Estoque</span><span>${total}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`,
            });
        });
}


/**
 * Sweet Alert Product Item Show
 */
function productItemShow(id) {
    let product = document.querySelector(`#product_item_show_${id}`);
    let link = product.dataset.value;

    fetch(link)
        .then((response) => {
            if (!response.ok) {
                throw new Error(response.statusText);
            }
            return response.json();
        })
        .catch((error) => {
            Swal.showValidationMessage(`Request failed: ${error}`);
        })
        .then((result) => {
            var price = Number(result.product_stock.sale_price).toLocaleString(
                "pt-BR",
                { style: "currency", currency: "BRL" }
            );
            var total = Number(result.product_stock.total).toLocaleString(
                "pt-BR",
                { style: "currency", currency: "BRL" }
            );
            console.log(result);
            // create a 'Swal' variable
            Swal.fire({
                title: `${result.name}`,
                showConfirmButton: false,
                showCloseButton: true,
                showCancelButton: true,
                cancelButtonText: "Sair",
                width: "35em",
                padding: "1em",
                html: `
                        <div class="container-fluid">
                            <div class="row justify-content-center mx-auto">
                                <div class="col-md-8 col-lg-6 col-xl-12">
                                    <div class="card text-black">
                                        <div class="text-center"><img src="${result.product_detail.image}" class="rounded" alt="Imagem do produto" width="50%"/></div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <p class="text-muted mb-4">${result.name}</p>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-sm table-bordered">
                                                    <tr>
                                                        <th class="text-start">Id:</th>
                                                        <td class="text-start">${result.id}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Preço:</th>
                                                        <td class="text-start">${price}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Quantidade em Estoque:</th>
                                                        <td class="text-start">${result.product_stock.quantity}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Comp, Alt e Larg(cm)</th>
                                                        <td class="text-start">${result.product_detail.length} X ${result.product_detail.height} X ${result.product_detail.width}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Peso(Kg)</th>
                                                        <td class="text-start">${result.product_detail.weight}</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-start">Descrição:</th>
                                                        <td class="text-start">${result.description}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`,
            });
        });
}

/**
 * Crop and preview image on product form
 */
const imageProduct = document.getElementById("image-product");
const inputImage = document.getElementById("input-image");
const imagePreview = document.getElementById("image-preview");
let cropBtn = document.getElementById("crop-btn");
let croppie;

if(inputImage){
    imagePreview.style.display = "none";
    cropBtn.style.display = "none";

    inputImage.addEventListener("change", function () {
        imageProduct ? (imageProduct.style.display = "none") : "";

        cropBtn.style.display = "block";

        if (croppie) {
            croppie.destroy();
        }

        const file = inputImage.files[0];
        const reader = new FileReader();
        reader.onload = function (event) {
            cropBtn.classList.remove("btn-success");
            cropBtn.innerText = "Recortar";

            imagePreview.src = event.target.result;
            croppie.bind({
                url: event.target.result,
            });
        };
        reader.readAsDataURL(file);

        croppie = new Croppie(imagePreview, {
            viewport: {
                width: 200,
                height: 200,
                type: "square",
            },
            boundary: {
                width: 300,
                height: 300,
            },
            enableOrientation: true,
        });

        cropBtn.addEventListener("click", function () {
            croppie
                .result({
                    type: "base64",
                    format: "jpeg",
                    size: {
                        width: 300,
                        height: 300,
                    },
                })
                .then(function (croppedImage) {
                    let croppedImageInput =
                        document.getElementById("croppedImage");
                    croppedImageInput.value = croppedImage;
                    cropBtn.classList.add("btn-success");
                    cropBtn.innerText = "Recortado";
                });
        });
    });
}

/**
 * Submit form destroy
 */
function formSubmit(id) {
    let form_destroy = document.querySelector(`#form_destroy_${id}`);
    form_destroy.submit();
}

/**
 * Only call `feather.replace` once on each page Icons
 */
feather.replace();

/**
 * Clock
 */

function updateTime() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, "0");
    const minutes = now.getMinutes().toString().padStart(2, "0");
    const seconds = now.getSeconds().toString().padStart(2, "0");
    const clockElement = document.getElementById("clock");

    const amPm = hours >= 12 ? "pm" : "am";

    clockElement.innerHTML = `${hours}:${minutes}:${seconds} ${amPm}`;
}

/**
 * Mask Phone Client input
 */

const inputPhone = document.querySelector(".phone");

if(inputPhone){
    const handlePhone = (event) => {
        let input = event.target;
        input.value = phoneMask(input.value);
    };

    const phoneMask = (value) => {
        if (!value) return "";
        value = value.replace(/\D/g, "");
        value = value.replace(/(\d{2})(\d)/, "($1) $2");
        value = value.replace(/(\d)(\d{4})$/, "$1-$2");
        return value;
    };

    inputPhone.addEventListener("input", handlePhone);
}