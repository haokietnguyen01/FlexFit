import "./Login.css"
import { useEffect, useState } from "react";
import { Link, useLocation, useNavigate } from "react-router-dom";
import axios from "axios";
export default function Login() {
    const navigate = useNavigate();
    const [inputs, setInput] = useState({
        email: "",
        password: "",
    })
    const [errors, setErrors] = useState({})
    const handleInput = (e) => {
        const nameInput = e.target.name;
        const value = e.target.value;
        console.log(value)
        setInput(state => ({ ...state, [nameInput]: value }))
    }
    function handleSubmit(e) {
        e.preventDefault();
        let errorSubmit = {};
        let flag = true;
        if (inputs.email == "") {
            errorSubmit.email = "Please enter email";
            flag = false;
        }
        if (inputs.password == "") {
            errorSubmit.password = "Please enter your password";
            flag = false;
        }
        if (!flag) {
            setErrors(errorSubmit);
        }
        if (flag) {
            const data = {
                email: inputs.email,
                password: inputs.password
            }
            console.log(data)
            axios.post("http://localhost/BE/public/api/login", data)
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
        <div id="login">
            <div className="container">
                <div className="row border-login">
                    <div className="col-sm-5  padding-login">
                        <div className="row">
                            <div className="col-sm-5 mt-3 login_logo ta-end">
                                <img src="http://localhost/BE/public/images/Image8.jpg" alt={8888} />
                            </div>
                            <div className="col-sm-6">
                                <p className="login_logo_name mbt-0">FlexFit</p>
                            </div>
                        </div>
                        <div className="mt-4 center">
                            <p className="login_title red">LOGIN</p>
                        </div>
                        <form action className="login_form" onSubmit={handleSubmit}>
                            <div>
                                <p className="gray">Email Address</p>
                                <input className="mb-3" type="text" name="email" placeholder="alex@gmail.com" /><i className="fa-regular fa-envelope" onChange={handleInput}/>
                            </div>
                            <div>
                                <p className="gray">Password</p>
                                <input className="mb-3" type="password" name="password" placeholder="Enter your password" /><i className="fa-solid fa-key" onChange={handleInput}/>
                            </div>
                            <div className="ta-end login_forgot_password">
                                <a href="#">Forgot Password ?</a>
                            </div>
                            <div className="login_btn_login">
                                <button className="btn">Login now</button>
                            </div>
                            <div className="flex mt-4">
                                <p className="login_border_left" />
                                <p className="gray">OR</p>
                                <p className="login_border_right" />
                            </div>
                            <div className="login_btn_sign_up">
                                <Link to="/user/public/register" className="btn">Sign up now</Link>
                            </div>
                        </form>
                    </div>
                    <div className="col-sm-6 login_ml">
                        <div className="login_image">
                            <img src="http://localhost/BE/public/images/Image7.jpg" alt={8888} className="hover-effect" />
                        </div>
                    </div>
                    <div>
                        <Error errors={errors}/>
                    </div>
                </div>
            </div>
        </div>
    )
}