import { Link } from "react-router-dom";
import "./Changepassword.css";

export default function ChangePassword() {
    return (
        <div id="changePassword">
            <div className="container">
                <div className="row">
                    <div className="col-sm-3 changePassword_border mb-5">
                        <div className="mb-5 changePassword_setting">
                            <a href="#"><i className="fa-solid fa-chevron-left" /><span className="fs-20 font-weight">Settings</span></a>
                        </div>
                        <div className="changePassword_detail">
                            <Link to="/user/edit_information" className="mb-5"><i className="fa-solid fa-pencil" /><span className="near_gray">Edit
                                profile</span></Link>
                            <a href data-bs-toggle="collapse" className="mb-4 arrow-link" data-bs-target="#demo"><i className="fa-solid fa-shield" /><span className="near_gray">Security</span></a>
                            <div id="demo" className="collapse padding-security show">
                                <Link to="/user/changepassword"><i className="fa-solid fa-key" />Change the password</Link>
                                <Link className="mt-4" to="/user/disableaccount"><i className="fa-solid fa-ban" />Disable Account</Link>
                            </div>
                        </div>
                    </div>
                    <div className="col-sm-9">
                        <div className="row">
                            <div className="col-sm-12 changePassword_padding">
                                <p className="red font-weight fs-25 changePassword_title mb-5">Change The Password</p>
                            </div>
                            <div className="col-sm-10 changePassword_padding">
                                <form className="mb-5">
                                    <div>
                                        <p className="font-weight">Email</p>
                                        <input type="text" className="w-100 mb-4" placeholder="ABC@gmail.com" />
                                    </div>
                                    <div>
                                        <p className="font-weight">Password</p>
                                        <input type="password" className="w-100 mb-4" />
                                    </div>
                                    <div>
                                        <p className="font-weight">Re-Enter Password</p>
                                        <input type="password" className="w-100 mb-4" />
                                    </div>
                                    <div className="row mt-4">
                                        <div className="col-sm-6 center">
                                            <div className="btn-cancel">
                                                <button className="btn">Cancel</button>
                                            </div>
                                        </div>
                                        <div className="col-sm-6 center">
                                            <div className="btn-save">
                                                <button className="btn">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}