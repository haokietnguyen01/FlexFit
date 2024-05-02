import Navbar from "../../layout/Navbar/Navbar"
import "./Coach.css"
import { useState, useEffect } from "react";
import axios from "axios";
export default function Coach() {

    // phần khai báo 
    var admin = localStorage.getItem("authAdmin")
    if (admin) {
        admin = JSON.parse(admin);
    }
    const [getDataCoach, setDataCoach] = useState('');


    useEffect(() => {
        getInformationCoach();
    }, []);

    // lấy thông tin dữ liệu của coach
    function getInformationCoach() {
        axios.get('http://localhost/BE/public/api/getDataCoach')
            .then(response => {
                setDataCoach(response.data.coach)
                console.log(response.data.coach)
            })
            .catch(function (error) {
                console.log(error)
            })
    }
    
    // hiển thị thông tin chi tiết của coach
    function renderInformationCoach() {
        if (Object.keys(getDataCoach).length > 0) {
            return getDataCoach.map((value) => {
                return (
                    <tr>
                        <th scope="row"><input type="checkbox" /></th>
                        <td>{value.id}</td>
                        <td>{value.DOB}</td>
                        <td>{value.name}</td>
                        <td>{value.email}</td>
                        <td>{value.sex}</td>
                        <td>{value.phone}</td>
                        <td>{value.image}</td>
                        <td>{value.degree}</td>
                        <td>
                            <i onClick={() => Delete(
                                value.id
                            )}
                            class="fa-solid fa-ban"></i>
                        </td>
                    </tr>
                )
            })
        }
    }

    // xoá coach
    function Delete(id) {
        axios.post("http://localhost/BE/public/api/destroy/" + id)
            .then((response) => {
                setDataCoach(data => data.filter(coach => coach.id !== id));
            })
    }
    return (
        <div id="coach">
            {/* <div class="container mt-5"> */}
            <div className="row padding mt-2">
                <Navbar />
                <div className="col-sm-10">
                    <div className="row search">
                        <div className="col-sm-11 flex">
                            <div className="search-border">
                                <i className="fa-solid fa-magnifying-glass" />
                                <input type="text" placeholder="Search" className="w-80" />
                            </div>
                            <button className="btn btn-search">Search</button>
                        </div>

                        <div className="table_user mt-4">
                            <table className="table">
                                <thead>
                                    <tr>
                                        <th scope="col" />
                                        <th scope="col">Invoice ID</th>
                                        <th scope="col">DOB</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Sex</th>
                                        <th scope="col">Phone No</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Degree</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {renderInformationCoach()}

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}