from subprocess import run

from flask import Flask, jsonify, request
from flask_cors import cross_origin

app = Flask(__name__)


@app.route("/disable")
@cross_origin()
def disable():
    # return {k:v for (k,v) in request.args.items()}
    duration = int(request.args.get("duration", 0))  # should be 5 or 60
    # print(duration)
    output = run("pwd", capture_output=True).stdout
    # maybe do something with output one day
    return jsonify(f"pihole disabled for {duration} minutes")
