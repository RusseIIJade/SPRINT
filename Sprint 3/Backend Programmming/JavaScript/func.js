function setFormNotice(formElement, type, notice) {
	const noticeElement = formElement.querySelector(".form__notice");
	//Just shows the type of notice
	noticeElement.textContent = notice;
	noticeElement.classList.remove("form__notice--success", "form__notice--invalid");
	noticeElement.classList.add(`form__notice--${type}`);
}

//Select the input notice element and sets the text content invalid
function setInputinvalid(inputElement, notice) {
	inputElement.classList.add("form__input--invalid");
	inputElement.parentElement.querySelector(".form__input-invalid-notice").textContent = notice;
}

//Removes invalid
function clearInputinvalid(inputElement) {
	inputElement.classList.remove("form__input--invalid");
	inputElement.parentElement.querySelector(".form__input-invalid-notice").textContent = "";
}

//Once the document is ready, we can run this fucntion
document.addEventListener("DOMContentLoaded", () => {			

	const loginForm = document.querySelector("#login");
	const createAccountForm = document.querySelector("#createAccount");

	//When you click the create Account Link, the Login form will be Hidden
	//Also we are gonna remove the form--disabled of the Create Account form to make it vissible
	document.querySelector("#linkCreateAccount").addEventListener("click", e => {
		//Prevents default behaviour
		e.preventDefault();
		loginForm.classList.add("form--disabled");
		createAccountForm.classList.remove("form--disabled");
	});

	//this will just do the reverse of the above code where the Create Account will be hidden and our Login form will be visible
	//So The Login is hidden while the Create Account is enabled
	document.querySelector("#linkLogin").addEventListener("click", e =>{
		//Prevents default behaviour
		e.preventDefault();
		loginForm.classList.remove("form--disabled");
		createAccountForm.classList.add("form--disabled");
	});

	//when the user takes out the focus to Password and if the password is less than 5 then an invalid notice occurs
	document.querySelectorAll(".form__input").forEach(inputElement => {
		inputElement.addEventListener("blur", e => {

			//Update
			if (e.target.id == "signupPassword" && e.target.value.length > 0 && e.target.value.length < 8 && !e.target.value.match(/(?=.*[A-Z])(?=.*\d)(?=.*[a-zA-Z!#$%&? "])[a-zA-Z0-9!#$%&?]/) ) {
				setInputinvalid(inputElement, "Username must be at least 8 characters in legth, Containing at least 1 Capital Letter, 1 Number, and 1 Symbol!");
			}
		});

	});

});	