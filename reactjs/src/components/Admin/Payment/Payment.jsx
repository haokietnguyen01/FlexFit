import { Link } from "react-router-dom"
import "./Payment.css";
export default function Payment() {
    return (
        <div id="payment">
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
                                        <th scope="col">Total money</th>
                                        <th scope="col">UserID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td><i className="fa-regular fa-circle-xmark" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td><i className="fa-regular fa-circle-xmark" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td className="green"><i className="fa-solid fa-check" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td className="green"><i className="fa-solid fa-check" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td><i className="fa-regular fa-circle-xmark" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td><i className="fa-regular fa-circle-xmark" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td className="green"><i className="fa-solid fa-check" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td><i className="fa-regular fa-circle-xmark" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="checkbox" /></th>
                                        <td>1</td>
                                        <td>250000</td>
                                        <td>3</td>
                                        <td>Pham Dac Thinh</td>
                                        <td>0777118502</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td>2024-03-20 09:44:03</td>
                                        <td className="green"><i className="fa-solid fa-check" /></td>
                                        <td><i className="fa-solid fa-trash-can" /></td>
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