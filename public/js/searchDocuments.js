const searchButton = document.querySelector("#searchButton");
const divResults = document.querySelector("#results");
const tableResults = document.querySelector("#tableresults");
const tableBody = document.querySelector("#tableBody");
const fechaini = document.querySelector('#fechaini');
const fechafin = document.querySelector('#fechafin');
const companyid = document.querySelector('#companyid');
const spinner = document.querySelector('#spinner');
const printButton = document.getElementById('printButton');
let jsonData;
const base_url = window.location.origin;

searchButton.addEventListener('click', (e) => {
    e.preventDefault();
    spinner.classList.remove("results");
    tableResults.classList.add("results");
    fetch(`${base_url}/api/documents/${companyid.value}/${fechaini.value}/${fechafin.value}`)
        .then(response => response.json())
        .then(data => {
            if (data.data.length > 0) {
                let row = '';
                jsonData = data.data;
                data.data.forEach(a => {
                    console.log(a.filename);
                    row += `<tr>
                                <th>
                                    <a href="${a.filename}" target="_blank" onclick="window.open(this.href, this.target, 'width=1200,height=600'); return false;">${a.codedocument}</a>
                                </th>
                                <td>${a.typedocument.name}</td>
                                <td>${a.daterec.substring(0, 10)}</td>
                                <td>${a.sender}</td>
                                <td>
                                    ${a.state_id === 3 
                                        ? `<a href="${base_url}/documents/showresponse/${a.id}" class="btn btn-success btn-sm"><i class="far fa-check-square"></i> Ver Respuesta</a>` 
                                        : `<a href="${base_url}/documents/${a.id}/response" class="btn btn-success btn-sm"><i class="far fa-check-square"></i> Responder</a>`}
                                </td>
                            </tr>`;
                });
                tableBody.innerHTML = row;
                spinner.classList.add("results");
                tableResults.classList.remove("results");
                //add pagination here!!!
            }else{
                spinner.classList.add("results");
                tableResults.classList.add("results");
                Swal.fire({
                    icon: 'info',
                    text: 'La consulta no produjo resultados!'
                });
            }        
        })
        .catch(
            error => {
                spinner.classList.add("results");
                tableResults.classList.add("results");
                Swal.fire({
                    icon: 'error',
                    text: 'Se produjo un error al ejecutar la consulta!'
                });
            }
        );
});


printButton.addEventListener('click', (e) => {
    e.preventDefault();
    printJS({printable: jsonData, 
        properties: [
            { field: 'codedocument', displayName: 'Radicado'},
            { field: 'typedocument.name', displayName: 'Tipo'},
            { field: 'daterec', displayName: 'Fecha'},
            { field: 'sender', displayName: 'Origen'}
        ],
        type: 'json'})
});