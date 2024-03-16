# from flask import Flask, request, jsonify
# import pickle
# import pandas as pd

# app = Flask(__name__)

# # Đường dẫn đến tệp .sav của mô hình
# model_path = "bayesian_ridge_regression.sav"

# # Load mô hình từ tệp .sav
# with open(model_path, 'rb') as file:
#     loaded_model = pickle.load(file)

# # Định nghĩa API endpoint để nhận dữ liệu và trả về dự đoán
# @app.route('/predict', methods=['POST'])
# def predict():
#     try:
#         # Nhận dữ liệu từ yêu cầu POST
#         user_input = request.json

#         # Tạo DataFrame từ user_input
#         input_df = pd.DataFrame(user_input, index=[0])

#         # Sử dụng mô hình để thực hiện dự đoán
#         X_test = input_df.values
#         predictions = loaded_model.predict(X_test)

#         # Trả về kết quả dự đoán dưới dạng JSON
#         return jsonify({'prediction': predictions[0]})

#     except Exception as e:
#         # Trả về lỗi nếu có bất kỳ lỗi nào xảy ra
#         return jsonify({'error': str(e)})

# if __name__ == '__main__':
#     app.run(debug=True)

from flask import Flask, request, jsonify
import pandas as pd
import numpy as np
import pickle

app = Flask(__name__)

# Load mô hình từ tệp .sav
with open("bayesian_ridge_regression.sav", 'rb') as file:
    model = pickle.load(file)

def convert_sex(sex):
    return 1 if sex.lower() == 'm' else 0

@app.route('/predict', methods=['POST'])
def predict():
    try:
        # Nhận dữ liệu từ yêu cầu POST
        data = request.json
        
        # Chuyển đổi giới tính thành số
        data['Sex'] = convert_sex(data['Sex'])

        # Tạo DataFrame từ dữ liệu nhận được
        input_data = pd.DataFrame([data])

        # Dự đoán
        prediction = model.predict(input_data)

        # Trả về kết quả dự đoán cùng với các thông tin Sex, Age, Height, và Weight
        result = {
            'Body Fat': prediction[0],
            'Sex': data['Sex'],
            'Age': data['Age'],
            'Height': data['Height'],
            'Weight': data['Weight'],
            'Neck': data['Neck'],
            'Chest': data['Chest'],
            'Abdomen': data['Abdomen'],
            'Hip': data['Hip'],
            'Thigh': data['Thigh'],
            'Knee': data['Knee'],
            'Ankle': data['Ankle'],
            'Biceps': data['Biceps'],
            'Forearm': data['Forearm'],
            'Wrist': data['Wrist']
        }

        return jsonify(result)

    except Exception as e:
        # Trả về lỗi nếu có lỗi xảy ra
        return jsonify({'error': str(e)})

if __name__ == '__main__':
    app.run(debug=True)
