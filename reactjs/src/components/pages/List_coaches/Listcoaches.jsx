import "./Listcoaches.css"
export default function Listcoaches() {
    return (
        <div id="list_coaches">
            <div className="container">
                <div className="center">
                    <h2>List Coaches</h2>
                </div>
                <div className="row">
                    <div className="col-sm-4 padding mt-3">
                        <div className="list_coaches_search flex">
                            <input type="text" className="w-90" placeholder="Tìm Kiếm" />
                            <button className="btn">
                                <i className="fa-solid fa-magnifying-glass" />
                            </button>
                        </div>
                        <div className="border-bt mt-3" />
                        <div className="rating mt-3">
                            <p className="rating_title mbt-0 mb-1">Đánh giá</p>
                            <div className="rating_star">
                                <div className="rating_star_flex">
                                    <input type="checkbox" className="mt-2" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                </div>
                                <div className="rating_star_flex">
                                    <input type="checkbox" className="mt-2" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                </div>
                                <div className="rating_star_flex">
                                    <input type="checkbox" className="mt-2" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                </div>
                                <div className="rating_star_flex">
                                    <input type="checkbox" className="mt-2" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                </div>
                                <div className="rating_star_flex">
                                    <input type="checkbox" className="mt-2" />
                                    <i className="fa-solid fa-star" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="col-sm-7 list_coaches_container mt-3 mb-5">
                        <div className="row list_coaches_detail">
                            <div className="col-sm-3">
                                <img src="http://localhost/BE/public/images/Image10.png" alt={8888} />
                            </div>
                            <div className="col-sm-9 list_coaches_padding">
                                <div className="flex mb-3 list_coaches_star">
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <p className="point">5.0</p>
                                </div>
                                <p className="list_coaches_name">Trần Văn A</p>
                                <div className="list_coaches_padding list_coaches_items">
                                    <p className="list_coaches_location"><i className="fa-solid fa-location-dot" /> <span>Đà Nẵng</span></p>
                                    <p className="list_coaches_birth"><i className="fa-solid fa-calendar-days" /><span> dd/mm/yyyy</span></p>
                                    <p className="list_coaches_experience"><i className="fa-solid fa-graduation-cap" /><span>3 năm kinh nghiệm </span></p>
                                </div>
                                <div className="ta-end">
                                    <button className="btn">Hire</button>
                                </div>
                            </div>
                        </div>
                        <div className="row list_coaches_detail mt-2">
                            <div className="col-sm-3">
                                <img src="http://localhost/BE/public/images/Image10.png" alt={8888} />
                            </div>
                            <div className="col-sm-9 list_coaches_padding">
                                <div className="flex mb-3 list_coaches_star">
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <p className="point">5.0</p>
                                </div>
                                <p className="list_coaches_name">Trần Văn A</p>
                                <div className="list_coaches_padding list_coaches_items">
                                    <p className="list_coaches_location"><i className="fa-solid fa-location-dot" /> <span>Đà Nẵng</span></p>
                                    <p className="list_coaches_birth"><i className="fa-solid fa-calendar-days" /><span> dd/mm/yyyy</span></p>
                                    <p className="list_coaches_experience"><i className="fa-solid fa-graduation-cap" /><span>3 năm kinh nghiệm </span></p>
                                </div>
                                <div className="ta-end">
                                    <button className="btn">Hire</button>
                                </div>
                            </div>
                        </div>
                        <div className="row list_coaches_detail mt-2">
                            <div className="col-sm-3">
                                <img src="http://localhost/BE/public/images/Image10.png" alt={8888} />
                            </div>
                            <div className="col-sm-9 list_coaches_padding">
                                <div className="flex mb-3 list_coaches_star">
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <i className="fa-solid fa-star" />
                                    <p className="point">5.0</p>
                                </div>
                                <p className="list_coaches_name">Trần Văn A</p>
                                <div className="list_coaches_padding list_coaches_items">
                                    <p className="list_coaches_location"><i className="fa-solid fa-location-dot" /> <span>Đà Nẵng</span></p>
                                    <p className="list_coaches_birth"><i className="fa-solid fa-calendar-days" /><span> dd/mm/yyyy</span></p>
                                    <p className="list_coaches_experience"><i className="fa-solid fa-graduation-cap" /><span>3 năm kinh nghiệm </span></p>
                                </div>
                                <div className="ta-end">
                                    <button className="btn">Hire</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}