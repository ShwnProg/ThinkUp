<?php
class ThinkUpDB
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'shawnmarlogaldo@1122';
    private $database = 'thinkup_db';
    public $pdo;
    public function __construct()
    {
        $this->ConnectDB();
    }
    public function ConnectDB()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host; dbname=$this->database", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function CloseDB()
    {
        $this->pdo = null;
    }

    public function AuthenticateUser($username, $password)
    {
        try {
            // Fetch user record by username
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Verify password against hashed password
                if (password_verify($password, $user['user_password'])) {
                    // Debug
                    var_dump($password, $user['user_password']);
                    return $user; // Successful login
                }
            }
            // var_dump($username,$user['username'],$password, $user['user_password']);

            return false; // Failed login
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function AuthenticateAdmin($username, $password)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM admins WHERE admin_name = :username");
            $stmt->execute(['username' => $username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin) {
                if (password_verify($password, $admin['admin_password'])) {

                    return $admin; // Successful admin login
                }
            }
            return false; // Failed login
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function FindAccount($input)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT user_id,fullname FROM users WHERE player_id = :player_id OR email = :email");

            $stmt->execute([
                'player_id' => $input,
                'email' => $input
            ]);

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function CheckUsernameExists($username)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT user_id FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function RegisterAccount($username, $first_name, $last_name, $email, $suffix, $birth_date, $gender, $player_id, $role, $password)
    {
        try {
            $fullname = $first_name . ' ' . $last_name;
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the insert statement
            $stmt = $this->pdo->prepare("
            INSERT INTO users (
                username,
                fullname,
                email,
                suffix,
                birthdate,
                gender,
                player_id,
                user_role,
                user_password
            ) VALUES (
                :username,
                :fullname,
                :email,
                :suffix,
                :birthdate,
                :gender,
                :player_id,
                :user_role,
                :user_password
            )
        ");

            // Execute with matching keys
            $stmt->execute([
                ':username' => $username,
                ':fullname' => $fullname,
                ':email' => $email,
                ':suffix' => $suffix,
                ':birthdate' => $birth_date,
                ':gender' => $gender,
                ':player_id' => $player_id,
                ':user_role' => $role,
                ':user_password' => $hashed_password
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function FindEmail($email)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT user_id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function IsSamePassword($user_id, $new_password)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT user_password FROM users WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return password_verify($new_password, $user['user_password']);
            }
            return false;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function UpdatePassword($user_id, $new_password)
    {
        try {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("UPDATE users SET user_password = :user_password WHERE user_id = :user_id");
            $stmt->execute([
                ':user_password' => $hashed_password,
                ':user_id' => $user_id
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>