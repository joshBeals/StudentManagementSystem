const addstudent = document.getElementById('addStudent');
const reg = document.getElementById('reg');
const edit = document.getElementById('edit');
const view = document.getElementById('viewAll');
const viewall = document.getElementById('allStudents');
const regTitle = document.getElementById('regTitle');
const regBtn = document.getElementById('regBtn');
const condition = document.getElementById('condition');

function showreg(){
	reg.classList.remove('hide');
	reg.classList.add('show');

	viewall.classList.add('hide');
	viewall.classList.remove('show');
}

addstudent.addEventListener('click', () => {
	console.log("fhkj");
	showreg();
});

view.addEventListener('click', () => {
	reg.classList.add('hide');
	reg.classList.remove('show');

	viewall.classList.add('show');
	viewall.classList.remove('hide');
});
