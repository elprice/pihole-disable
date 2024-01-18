import os
from flask import Flask, jsonify, request
from flask_cors import cross_origin

app = Flask(__name__)


@app.route("/disable")
@cross_origin()
def disable():
    # return {k:v for (k,v) in request.args.items()}
    duration = int(request.args.get("duration", 0))  # should be 5 or 60
    # print(duration)
    os.system(f"pihole disable {duration}m")
    # maybe do something with output one day
    return jsonify(f"pihole disabled for {duration} minutes")
