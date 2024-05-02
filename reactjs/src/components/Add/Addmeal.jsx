import { useEffect, useState } from "react";
import { Link, useLocation, useNavigate } from "react-router-dom";
import axios from "axios";
export default function Addmeal() {
    const navigate = useNavigate();

    const [input, setInput] = useState({
        name:""
    })
    const [errors, setErrors] = useState({})
    const handleInput = (e) => {
        const nameInput = e.target.name;
        const value = e.target.value;
        console.log(nameInput)
        console.log(value)
        setInput(state => ({ ...state, [nameInput]: value }))
    }
    function handleSubmit(e) {
        e.preventDefault();
        let errorSubmit = {};
        let flag = true;
        const data = {
            name:input.name
        }
        if (flag) {
            axios.post("http://localhost/BE/public/api/type_meal/create",data)
                .then(response => {
                    console.log(response)
                })
                .catch(function (error) {
                    console.log(error)
                    alert("thinh")
            })
        }
    }
    return (
        <div id="">
            <form className="addmeal" onSubmit={handleSubmit}>
                <div className>
                    <p className="">Meal:</p>
                    <input type="text" className="mb-3" name="name" placeholder="alex@gmail.com" onChange={handleInput} />
                </div>
                
                <div className="">
                    <button className="btn">Submit</button>
                </div>
            </form>
        </div>
    )
}