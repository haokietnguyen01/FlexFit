import { Link } from "react-router-dom"
import "./User.css"
export default function User() {
    return (
        <div id="user">
            {/* <div class="container mt-5"> */}
            <div className="row padding mt-5">
                <div className="col-sm-2">
                    <div className="border-container">
                        <div className="logo flex mt-5">
                            <img src="http://localhost/BE/public/images/Image8.jpg" alt={8888} />
                            <p className>FlexFit</p>
                        </div>
                        <div className="mt-5 menu_detail">
                            <div className="flex">
                                <p className="mb-3 w"><i className="fa-solid fa-user" /></p>
                                <Link to="/admin/user">User</Link>
                            </div>
                            <div className="flex">
                                <p className="mb-3 w"><i className="fa-solid fa-utensils" /></p>
                                <Link to="/admin/meal">Add meals</Link>
                            </div>
                            <div className="flex">
                                <p className="mb-3 w"><i className="fa-solid fa-dumbbell" /></p>
                                <Link to="/admin/exercise">Add Exercises</Link>
                            </div>
                            <div className="flex">
                                <p className="mb-3 w"><i className="fa-regular fa-credit-card" /></p>
                                <Link to="/admin/payment">Payment</Link>
                            </div>
                        </div>
                    </div>
                </div>
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
                                        <th scope="col">Email</th>
                                        <th scope="col">Adress</th>
                                        <th scope="col">Phone No</th>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Degree</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>18/5/2002</td>
                                        <td>thinhpd1805@gmail.com</td>
                                        <td>k42/38 Nguyễn Thành Hãn2222222222222</td>
                                        <td>0777118502</td>
                                        <td className="avatar">
                                            <img src="http://localhost/BE/public/images/Image13.png" alt={8888} />
                                        </td>
                                        <td className="degree">
                                            <img src="http://localhost/BE/public/images/Image12.jpg" alt={8888} />
                                        </td>
                                        <td><i className="fa-solid fa-ban" /></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}