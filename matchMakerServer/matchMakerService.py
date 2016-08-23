import "matchMakerService"
import "../notifierServer/notifierServer"

serv = MatchMakerServer()
id = sys.argv[0]
lat = sys.argv[1]
lon = sys.argv[2]
response = serv.checkForNearby(id, lat, lon)
ids = []
sql = "INSERT INTO `encounters` (`id1`, `id2`, `lat1`, `lat2`, `lon1`, `lon2`) VALUES ('" + id + "', '%s', '" + lat + "', '%s', '" + lon + "', '%s')"
for (id2, lat2, lon2) in response:
	serv.execSQL(sql.format(id2, lat2, lon2))
	ids.append(id2)
if(len(ids) > 0):
	notify = NotifierServer()
	notify.notifyClient(id, ids)