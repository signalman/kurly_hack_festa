import pandas as pd
import pymysql

db = pymysql.Connect(host='localhost', user='root', password='1234', database='customer',charset='utf8')
cursor = db.cursor()

sql = "SELECT * FROM user_table"
cursor.execute(sql)

pro = cursor.fetchall()

pro = pd.DataFrame(pro)
#print(pro)
db.close()

pro.columns = ['ID', 'gender', 'age', 'Rec_vi_pr_1', 'Rec_vi_pr_2', 'Rec_vi_pr_3']

pro_id = pro["ID"].iloc[-1]

from sklearn.preprocessing import LabelEncoder
le = LabelEncoder()
pro['gender'] = le.fit_transform(pro['gender'])

pro['Rec_vi_pr_1'].unique()

pro['Rec_vi_pr_1'].replace({'국': 0, '면': 1, '샐러드': 2, '정육' : 3, '계란' : 4, '오일' : 5, '반찬' : 6, '메인요리' : 7, '술' : 8, '음료' : 9, '과일' : 10, '채소' : 11, '간식' : 12, '쌀' : 13, '해산물' : 14}, inplace = True)
pro['Rec_vi_pr_2'].replace({'국': 0, '면': 1, '샐러드': 2, '정육' : 3, '계란' : 4, '오일' : 5, '반찬' : 6, '메인요리' : 7, '술' : 8, '음료' : 9, '과일' : 10, '채소' : 11, '간식' : 12, '쌀' : 13, '해산물' : 14}, inplace = True)
pro['Rec_vi_pr_3'].replace({'국\r': 0, '면\r': 1, '샐러드\r': 2, '정육\r' : 3, '계란\r' : 4, '오일\r' : 5, '반찬\r' : 6, '메인요리\r' : 7, '술\r' : 8, '음료\r' : 9, '과일\r' : 10, '채소\r' : 11, '간식\r' : 12, '쌀\r' : 13, '해산물\r' : 14}, inplace = True)
#print(pro)
pro = pro.fillna(0)
from sklearn.model_selection import train_test_split
X_train, X_test, y_train, y_test = train_test_split(pro[['gender', 'age', 'Rec_vi_pr_1','Rec_vi_pr_2',]],\
                                                    pro['Rec_vi_pr_3'],test_size = 0.2, random_state =42, shuffle = False)
from xgboost import XGBClassifier

model = XGBClassifier(n_estimators=500, learning_rate=0.2, max_depth=4, random_state = 32)
from sklearn.preprocessing import StandardScaler

scaler = StandardScaler()

#print(X_train)
#print("11111")
#print(X_test)
X_train = scaler.fit_transform(X_train)
X_test = scaler.fit_transform(X_test)

model.fit(X_train,y_train)
y_pred = model.predict(X_test)
#print(model.score(X_train,y_train))
result = pd.DataFrame({'pred' : y_pred, 'real' : y_test})
result = pd.DataFrame({'pred' : y_pred, 'real' : y_test})
result['pred'].replace({
    0: '국', 1: '면', 2 : '샐러드', 3 : '정육', 4 : '계란', 5 : '오일', 6 :'반찬', 7 : '메인요리',
8 :'술',9 : '음료',10 : '과일',11 : '채소',12 : '간식',13 : '쌀',14 : '해산물'}, inplace = True)
recommend = result["pred"].iloc[-1]

db = pymysql.Connect(host='localhost', user='root', password='1234', database='customer')
cursor = db.cursor()
query = "update user_table set Rec_vi_pr_3 = %s where ID = %s;"
data = (recommend)
cursor.execute(query, (data, pro_id))
print(recommend)
db.commit()
db.close()

print(recommend)