import sys
import mysql.connector
import "../server"

class MatchMakerServer(Server):
	def checkForNearby(id, lat, lon):
		sql = "SELECT `id`, `lat`, `long`, ( 3959 * acos( cos( radians(`lat`) ) * cos( radians( '" + lat + "' ) ) * cos( radians( '" + lon + "' ) - radians(`lon`) ) + sin( radians(`lat`) ) * sin( radians( '" + lat + "' ) ) ) ) AS distance FROM `userLocations` LEFT JOIN `id` ON `userLocations.id` = `users.id` HAVING distance < 0.0095"
		return executeSQL(sql)