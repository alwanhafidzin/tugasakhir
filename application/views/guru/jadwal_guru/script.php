<script>
const table = document.getElementById("jadwal_siswa");

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
</script>