import "./Meal.css"
import { Link } from "react-router-dom"
export default function Meal() {

    return (
        <div id="addmeal">
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
                                <p  className="mb-3 w"><i className="fa-solid fa-user" /></p>
                                <Link to="/admin/user">User</Link>
                            </div>
                            <div className="flex">
                                <p  className="mb-3 w"><i className="fa-solid fa-utensils" /></p>
                                <Link to="/admin/meal">Add meals</Link>
                            </div>
                            <div className="flex">
                                <p  className="mb-3 w"><i className="fa-solid fa-dumbbell" /></p>
                                <Link to="/admin/exercise">Add Exercises</Link>
                            </div>
                            <div className="flex">
                                <p  className="mb-3 w"><i className="fa-regular fa-credit-card" /></p>
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
                                        <th scope="col">Product Type</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Carb</th>
                                        <th scope="col">Fiber</th>
                                        <th scope="col">Protein</th>
                                        <th scope="col">Calo/Kcal</th>
                                        <th scope="col" />
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th />
                                        <td>
                                            <select>
                                                <option>Meal</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select>
                                                <option>Beef</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select>
                                                <option>100</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select>
                                                <option>100</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select>
                                                <option>100</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select>
                                                <option>100</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button className="btn btn-add">
                                                <i className="fa-solid fa-plus" /> Add
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>Meats</td>
                                        <td>Beef</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>100</td>
                                        <td>
                                            <a><i className="fa-solid fa-gear" /></a>
                                            <a><i className="fa-solid fa-trash-can" /></a>
                                        </td>
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