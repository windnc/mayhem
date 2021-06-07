from flask import Flask, redirect, render_template


app = Flask(__name__)
app.secret_key = "mysecretkey"

@app.route("/")
def route_index():
    return render_template("home.jinja2", v={})


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8850, debug=True)

