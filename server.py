import sys;
import mysql.connector;

class Server():
	def __init__(self):
		try:
			self.cnx = mysql.connector.connect(user='root', password='IdgyMama', database='Collector')
		except mysql.connector.Error as error:
			if err.errno == errorcode.ER_ACCESS_DENIED_ERROR:
				print("Something is wrong with your user name or password")
			elif err.errno == errorcode.ER_BAD_DB_ERROR:
				print("Database does not exist")
			else:
				print(err)
	def executeSQL(sql):
		cursor = self.cnx.cursor()
		cursor.execute(sql)
		return cursor # returns cursor that either needs to be cursor.commit() for inserts and cursor.close() for query
		