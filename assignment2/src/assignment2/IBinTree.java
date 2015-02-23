package assignment2;

public interface IBinTree {

	public IBinTree getLeft();
	public IBinTree getRight();
	public void setLeft(BinTree bt);
	public void setRight(BinTree bt);
	public boolean hasLeft();
	public boolean hasRight();
	public int sumNodes();
	public int height();
	
}
