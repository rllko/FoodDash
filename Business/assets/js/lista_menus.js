var dable = new Dable();
var rows = [];
var list_columns = [ '', '','', '','' ];
var items = [];
const response = fetch('./lista_opcoes.php')
  .then(response => response.json())
  .then(data => {
    for(item of data.itens){
      console.log(item);
      items.push(item);
      rows.push([ item.foto_url, item,item,item.id,item.id]);
    }
    return rows;
  })
  .then( _ =>{
    dable.SetDataAsRows(rows)
    dable.style = 'fooddash_menu';
	  dable.SetColumnNames(list_columns);
    dable.columnData[0].CustomRendering = function(cellValue, rowNumber) {
			return '<img src="../assets/stock_imgs/'+cellValue+'" alt="'+cellValue+'" class="rounded" width="70" height="70" data-rownumber="' + rowNumber + '">';
		};

    dable.columnData[1].CustomRendering = function(cellValue, rowNumber) {
			return `    
      <div class="row justify-content-center">
          <div class="">
              <div class="fw-bold fs-5">${cellValue.nome}</div>
              <div class="fs-6 small">${cellValue.quantidade}${cellValue.quantidade == 1 ? " item" : " itens"}</div>
          </div>
      </div>`;
		};

    dable.columnData[2].CustomRendering = function(cellValue, rowNumber) {
			return `    
      <div class="row justify-content-center">
              <div class="fw-bold fs-5 price-tag text-center" style="width:10vw">${cellValue.preco} €</div>
      </div>`;
		};
    dable.columnData[3].CustomRendering = function (_cellValue, rowNumber) {
    return '<button> <img width="30" class="bg-white editRow img-fuid" src="./assets/imgs/edit.png" data-rownumber="' + rowNumber + '" /></button>';
  };
    dable.columnData[4].CustomRendering = function (_cellValue, rowNumber) {
    return '<button type="button"> <img width="30" class="img-fuid bg-white deleteRow" cellValue="'+_cellValue+'" src="./assets/imgs/delete.png" data-rownumber="' + rowNumber + '" /></button>';
  };
	dable.BuildAll("DefaultDable"); 
  }).catch((error) => console.error('Error:', error));
	
  
  document.addEventListener('click', handleDeleteButtonClick);

function handleDeleteButtonClick(event) {
    if (event.target.classList.contains('editRow')) {
        editItem(event.target);

    }   
    if (event.target.classList.contains('deleteRow')) {
      performDelete(event.target);
    }
}

function performDelete(element){
  const cellValue =  element.getAttribute("cellValue");
  console.log(cellValue);
  const rownumber =  element.getAttribute("data-rownumber");
  const request = fetch("./lista_opcoes.php?deletemenu="+cellValue);
  request.then(reply => {
    console.log(reply);
    dable.DeleteRow(rownumber);
  });
}

function removeItem(element) {
  // mandar para base de dados
  var rowNumber = element.getAttribute('data-rownumber');
  dable.DeleteRow(rowNumber);
}

function editItem(element) {
  // mandar para base de dados
  var rowNumber = element.getAttribute('data-rownumber');

  const item = items[rowNumber];
  window.open(`./dashboard_inserir_item.php?menuid=${item.id}`);

}
