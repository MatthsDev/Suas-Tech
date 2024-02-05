import sys
import os
import smtplib
from email.message import EmailMessage
import ssl
from senhaMyEmail import senha

# configurando email e senha
EMAIL_ADDRESS = 'techsuas@gmail.com'
EMAIL_PASSWORD = senha

#

remetente = "techsuas@gmail.com"

assunto = "CREDENCIAIS PARA ACESSO DO SISTEMA TECH-SUAS"

# Capturar os parâmetros passados pelo PHP
nome_usuario = sys.argv[1]
senha_segura = sys.argv[2]
destinatario = sys.argv[3]
nome_completo = sys.argv[4]

corpo_email = f"""
<html>
<head></head>
<body>
    <p>Olá,</p>
    <p>Aqui estão as suas credenciais para acessar o sistema Tech-Suas:</p>
    <p>Usuário: {nome_usuario}</p>
    <p>Senha: {senha_segura}</p>
    <p>Por favor, mantenha essas informações em segredo.</p>
    <p>Atenciosamente,<br>
        Tech-Suas</p>
</body>
</html>
"""

em = EmailMessage()
em['From'] = remetente
em['To'] = destinatario
em['Subject'] = assunto
em.set_content(corpo_email, subtype='html')  # Definir o tipo de conteúdo para HTML

context = ssl.create_default_context()

try:

    with smtplib.SMTP('smtp.gmail.com', 587) as smtp:
        smtp.starttls()  # Use starttls() em vez de SMTP_SSL
        smtp.login(remetente, senha_remetente)
        smtp.sendmail(remetente, destinatario, em.as_string())
except Exception as e:
    print(f"Erro ao enviar e-mail: {e}")
