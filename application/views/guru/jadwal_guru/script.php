<script>
const table = document.getElementById("jadwal_guru");

let headerCell = null;

for (let row of table.rows) {
  const firstCell = row.cells[0];
  if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
    headerCell = firstCell;
  } else {
    headerCell.rowSpan++;
    firstCell.remove();
  }
}

// function printData()
// {
//    var divToPrint=document.getElementById("jadwal_guru");
//    newWin= window.open("");
//    newWin.document.write(divToPrint.outerHTML);
//    newWin.print();
//    newWin.close();
// }
// $('#btn-print').on('click',function(){
// printData();
// })
</script>