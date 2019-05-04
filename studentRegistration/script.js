const login = document.getElementById('login');
const register = document.getElementById('register');
const log = document.getElementById('log');
const reg = document.getElementById('reg');

login.addEventListener('click', () => {
	log.classList.add('show');
	log.classList.remove('hide');

	reg.classList.add('hide');
	reg.classList.remove('show');
});

register.addEventListener('click', () => {
	log.classList.remove('show');
	log.classList.add('hide');

	reg.classList.add('show');
	reg.classList.remove('hide');
});
