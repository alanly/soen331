package assignment2;

public interface IBinTree {

	public IBinTree getLeft();
	public IBinTree getRight();
	public IBinTree setLeft(IBinTree bt);
	public IBinTree setRight(IBinTree bt);
	public boolean hasLeft();
	public boolean hasRight();
	public int sumNodes();
	public int height();
	
}
