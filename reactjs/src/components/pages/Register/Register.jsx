import "./Register.css"
import Error from "../../layout/Error/Error";
import { useEffect,useState } from "react";
import { Link, useLocation, useNavigate } from "react-router-dom";
import axios from "axios";
export default function Register() {
    const navigate = useNavigate();
    const [inputs, setInput] = useState({
        email: "",
        password: "",
        confirmpassword:"",
    })
    const handleInput = (e) => {
        const nameInput = e.target.name;
        const value = e.target.value;
        setInput(state => ({ ...state, [nameInput]: value }))
        console.log(value)
    }
    const[errors,setErrors]=useState({})
    function handleSubmit(e) {
        e.preventDefault();
        let errorSubmit = {};
        let flag = true;
        const isEmailValid = /\S+@\S+\.\S+/;
        if (!isEmailValid.test(inputs.email)) {
          errorSubmit.email = 'Email is not valid. Please include @gmail.com';
          flag = false;
        }else if(inputs.email==""){
            errorSubmit.email = "Please enter email";
            flag = false;
        }
        if(inputs.password==""){
            errorSubmit.password="Please enter password";
            flag = false;
        }else if(inputs.password.length <8){
            errorSubmit.password ="Please enter a password >8 characters";
            flag= false;
        }
        
        if(inputs.confirmpassword==""){
          errorSubmit.confirmpassword="Please enter confirmPassword";
          flag =false;
        }else if(inputs.confirmpassword != inputs.password){
          errorSubmit.connfirmpassword ="The password of confirmPassword is not the same as password";
          flag=false;
        }
        if(!flag){
            setErrors(errorSubmit);
        }
        if (flag) {
            const data = {
                email: inputs.email,
                password: inputs.password,
                role_id:1
            }
            axios.post("http://localhost/BE/public/api/register",data)
                .then(response => {
                    var authcustomer = {}
                    authcustomer.data = {}
                    // auth.user.auth_token=response.data
                    authcustomer.data.auth = response.data.user
                    localStorage.setItem("authcustomer", JSON.stringify(authcustomer))
                    navigate('/')
                })
                .catch(function (error) {
                    console.log(error)
                })
        }
    }
    return (
        <div id="register">
            <div className="container">
                <div className="row">
                    <div className="col-sm-6 ta-end register_logo">
                        <img src="http://localhost/BE/public/images/Image8.jpg" alt={8888} />
                    </div>
                    <div className="col-sm-6 register_logo_name">
                        <p className>Flexfit</p>
                    </div>
                    <div className="col-sm-12 center">
                        <div className="register_title">
                            <p>Register</p>
                        </div>
                    </div>
                    <div className="col-sm-12 center">
                        <form action className="register_form" onSubmit={handleSubmit}>
                            <div>
                                <p className="register_form_email">Email Address:</p>
                                <input type="text" className="mb-3" name="email" placeholder="alex@gmail.com" onChange={handleInput} /><i className="fa-regular fa-envelope" />
                            </div>
                            <div>
                                <p className="register_form_password">Password:</p>
                                <input type="password" className="mb-3" name="password" placeholder="Enter your password" onChange={handleInput} /><i className="fa-solid fa-key" />
                            </div>
                            <div>
                                <p className="register_form_confirm_password">Confirm Password:</p>
                                <input type="password" className="mb-4" name="confirmpassword" placeholder="Re-Enter your password" onChange={handleInput} /><i className="fa-solid fa-key" />
                            </div>
                            <div className="register_form_btn">
                                <button className="btn">Register now</button>
                            </div>
                            <div>
                                <Error errors={errors}/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    )
}